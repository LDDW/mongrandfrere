import bcrypt from "bcryptjs";
import jwt from "jsonwebtoken";
import randomToken from "random-web-token";
import { check, validationResult } from 'express-validator';

import { db } from "../db.js";
import registerEmail from "../emails/registerEmail.js";
import resetPassword from "../emails/resetPassword.js";

export const register = [
    check('lastname').trim().not().isEmpty().isLength({ min: 2 }),
    check('firstname').trim().not().isEmpty().isLength({ min: 2 }),
    check('email').trim().isEmail().normalizeEmail(),
    check('phone').trim().isMobilePhone(),
    check('password').trim().matches(/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$ %^&*-]).{8,}$/),
    check('confirm_password').trim().custom((value, { req }) => {
        if (value !== req.body.password) {
          throw new Error('Password confirmation does not match password');
        }
        return true;
    }), 
    (req, res) => {
        // VERIFY CHECK ERRORS
        const errors = validationResult(req);
        if (!errors.isEmpty()) {
            return res.status(400).json({ errors: errors.array() });
        }

        // //CHECK EXISTING USER
        const q = "SELECT * FROM users WHERE email = ? OR phone = ?";
    
        db.query(q, [req.body.email, req.body.phone], (err, data)=>{
            if(err) return res.status(500).json(err);
            if(data.length) return res.status(409).json("L'utilisateur exist déjà !");
            
            //HASH PASSWORD AND CREATE USER
            const salt = bcrypt.genSaltSync(10);
            const hash = bcrypt.hashSync(req.body.password.trim(), salt);
    
            // GENERATE TOKEN
            const token = randomToken.genSync("extra", 50);
            
            const q = "INSERT INTO users(`firstname`, `lastname`, `email`, `phone`, `password`, `token`) VALUES (?)";
            const values = [
                req.body.firstname.trim(),
                req.body.lastname.trim(),
                req.body.email.trim(),
                req.body.phone.trim(),
                hash,
                token,
            ];
            
            db.query(q,[values], (err,data) => {
                if(err) return res.status(500).json(err);
                // SEND EMAIl REGISTER VERIFICATION 
                registerEmail(req.body.email.trim(), token);
                return res.status(200).json("L'utilisateur à été créer")                
            });
        });
    }
]

export const login = [
    check('email').trim().isEmail().normalizeEmail(),
    check('password').not().isEmpty(),
    (req, res) => {
    const q = "SELECT * FROM users WHERE email = ?";

    db.query(q, [req.body.email], (err, data) => {
        if(err) return res.status(500).json(err);
        if(data.length === 0) return res.status(404).json("User not found !");

        //chek password
        const passwordIsCorrect = bcrypt.compare(req.body.password, data[0].password);
        if(!passwordIsCorrect) return res.status(400).json("Wrong email or password");

        const token = jwt.sign({ id: data[0].id }, "jwtkey");

        res.cookie('user-token', token, {
            maxAge: 900000,
            path:'/',
            domain: 'localhost',    
            // httpOnly: true,
            // secure: true,
        });
        res.status(200).json("LOGGED IN");
    });
}];

export const logout = (req, res) => {

    res.clearCookie('user-token', {
        path:'/',
        domain: 'localhost',
    })
        
    res.status(200).json("User has been logged out.")
}

export const ForgottenPassword = [
    check('email').trim().isEmail().normalizeEmail(),
    (req, res) => {
        const q = "SELECT * FROM users WHERE email = ?"

        db.query(q, [req.body.email], (err, data) => {
            if(err) return res.status(500).json(err);

            // GENERATE TOKEN
            const token = randomToken.genSync("extra", 50);
            
            if(data.length === 1){
                resetPassword(data[0].email, token)
            }

            res.status(200).json('Un email avec un code à été envoyé')
        });
    }
]
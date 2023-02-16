import express from "express";
import bcrypt from "bcryptjs"
import jwt from "jsonwebtoken"
import { check, validationResult } from 'express-validator'
import {db} from "../db.js"

const router = express.Router();

router.post('/register', 
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
    (req,res)=>{
        const errors = validationResult(req);

        if (!errors.isEmpty()) {
            return res.status(400).json({ errors: errors.array() });
        }
        //CHECK EXISTING USER
        const q = "SELECT * FROM users WHERE email = ? OR phone = ?"

        db.query(q, [req.body.email, req.body.phone], (err, data)=>{
            if(err) return res.status(500).json(err);
            if(data.length) return res.status(409).json("L'utilisateur exist déjà !");

            //HASH PASSWORD AND CREATE USER
            const salt = bcrypt.genSaltSync(10);
            const hash = bcrypt.hashSync(req.body.password.trim(), salt);

            const q = "INSERT INTO users(`lastname`, `firstname`, `email`, `phone`, `password`, `address`) VALUES (?)";
            const values = [
                req.body.lastname.trim(),
                req.body.firstname.trim(),
                req.body.email.trim(),
                req.body.phone.trim(),
                hash,
                JSON.stringify({
                    "name": "Ironman",
                    "address": "ani@gamil.com",
                    "city": "bhilai"
                })
            ];

            db.query(q,[values], (err,data)=>{
                if(err) return res.status(500).json(err);
                return res.status(200).json("L'utilisateur à été créer")
            });
        });
    },
);

router.post('/login', (req,res)=>{

})

router.post('/logout', (req,res)=>{

})

export default router;
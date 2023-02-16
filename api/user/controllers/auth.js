import {db} from "../../db.js"
import bcrypt from "bcryptjs"
import jwt from "jsonwebtoken"

export const register = (req,res)=>{
    //CHECK EXISTING USER
    const q = "SELECT * FROM users WHERE email = ? OR phone = ?"

    db.query(q, [req.body.email, req.body.phone], (err, data)=>{
        if(err) return res.status(500).json(err);
        if(data.length) return res.status(409).json("L'utilisateur exist déjà !");

        //HASH PASSWORD AND CREATE USER
        const salt = bcrypt.genSaltSync(10);
        const hash = bcrypt.hashSync(req.body.password, salt);

        const q = "INSERT INTO users(`lastname`, `firstname`, `email`, `phone`, `password`, `address`) VALUES (?)";
        const values = [
            req.body.lastname,
            req.body.firstname,
            req.body.email,
            req.body.phone,
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
    })

}

export const login = (req,res)=>{

}

export const logout =  (req,res)=>{

}
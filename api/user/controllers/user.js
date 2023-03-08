import jwt from "jsonwebtoken";
import { db } from "../db.js";

export const account = (req, res) => {
    console.log(req.cookies)

    jwt.verify(req.cookies.usertoken, "jwtkey", (err, user) => {
        if(err) return res.status(500).json(err);
        if(user) {
            const q = "SELECT * FROM users WHERE id = ?";
            db.query(q, user.id, (err, data) => {
                if(err) return res.status(500).json(err);
                res.status(200).json(data[0]);
            })
        }
    });

    
}
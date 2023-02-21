// DEPENDENCIES
import { check, validationResult } from 'express-validator';
import moment from "moment";
// IMPORT FILE
import { db } from "../db.js";
import confirmRegisterEmail from '../emails/ConfirmRegisterEmail.js';

export const verify = [
    check('token').not().isEmpty().isLength({ min: 50, max: 50 }),
    (req, res) => {
        // VERIFY CHECK ERRORS
        const errors = validationResult(req);
        if (!errors.isEmpty()) {
            return res.status(400).json({ errors: errors.array() });
        }
    
        // VERIFY IF TOKEN EXIST
        const q = "SELECT * FROM users WHERE token = ?";
    
        db.query(q, [req.body.token], (err, data) => {
            if(err) return res.status(500).json(err);

            if(data.length){

                if(data[0].email_verified_at === null){
                    const q = "UPDATE users SET token = ?, email_verified_at = ? WHERE token = ? AND email = ?";
                    const timestamps =  moment().local().format('YYYY-MM-DD hh:mm:ss');
                    const email = data[0].email;

                    db.query(q, [null, timestamps, req.body.token, email], (err, data) => {
                        if(err) return res.status(500).json(err);
                        confirmRegisterEmail(email);
                        return res.status(200).json("le compte a bien été vérifier");
                    });
                } else {
                    return res.status(500).json("le compte a déjà été vérifier");
                }

            } else {
                return res.status(500).json("le token de vérification n'existe pas")
            }

        }); 
    
    }
] 
import { transport } from "./config.js"

export default function resetPassword(email, code){

    const mailOptions = {
        from: `MonGrandFrère`, 
        to: email,
        subject: 'Réinitialisation du mot de passe',
        text: 'For clients with plaintext support only',
        html: `Réinitialiser mon mot de passe`,
    };

    transport.sendMail(mailOptions, function(err, info) {
        if (err) {
            console.log(err)
        } else {
            console.log(info);
        }
    });

}
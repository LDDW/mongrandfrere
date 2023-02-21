import { transport } from "./config.js"

export default function confirmRegisterEmail(email){

    const mailOptions = {
        from: `MonGrandFrère`, 
        to: email,
        subject: 'Confirmation de votre inscription',
        text: 'Votre email a bien été confirmer',
        html: `<p>Bienvenu votre email a bien été confirmer</p>`,
    };

    transport.sendMail(mailOptions, function(err, info) {
        if (err) {
            console.log(err)
        } else {
            console.log(info);
        }
    });

}
import { transport } from "./config.js"

export default function registerEmail(email, token) {

    const mailOptions = {
        from: `MonGrandFrère`, 
        to: email,
        subject: 'Vérifier votre email',
        text: 'For clients with plaintext support only',
        html: `<a href=>Confirmer l'inscritpion</a><p>${token} ${email}</p>`,
    };
    
    transport.sendMail(mailOptions, function(err, info) {
        if (err) {
            console.log(err)
        } else {
            console.log(info);
        }
    });

}
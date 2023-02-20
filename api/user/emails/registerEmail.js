import { transport } from "./config.js"

export default function registerEmail(email, token) {

    const mailOptions = {
        from: `MonGrandFrère`, 
        to: email,
        subject: 'Vérifier votre email',
        text: 'For clients with plaintext support only',
<<<<<<< HEAD
        html: `<a href="http://localhost:3000/verification-email?token=${token}">Confirmer l'inscritpion</a>`,
    };

=======
        html: `<a href=>Confirmer l'inscritpion</a><p>${token} ${email}</p>`,
    };
    
>>>>>>> main
    transport.sendMail(mailOptions, function(err, info) {
        if (err) {
            console.log(err)
        } else {
            console.log(info);
        }
    });

}
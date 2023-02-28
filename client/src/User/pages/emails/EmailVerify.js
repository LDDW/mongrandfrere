import axios from 'axios';
import { Card, Button } from 'flowbite-react';
import { useNavigate } from 'react-router-dom';

export default function EmailVerify(){
    const navigate = useNavigate();

    const token = {
        token: new URLSearchParams(window.location.search).get("token"),
    };

    const handleEmailVerify = async (e) => {
        try {
            await axios.post("http://localhost:3002/api/email/verify", token);
            navigate('/login')
        } catch (error) {
            console.log(error);
        }
    }

    return(
        <Card className='w-[500px] absolute top-1/2 left-1/2 -translate-y-1/2 -translate-x-1/2'>
            <h5 className="text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Vérifier mon address mail</h5>
            <p>Pour accéder à votre compte, veuillez vérifier votre adresse e-mail. Cliquer sur le bouton ci-dessous.</p>
            <Button onClick={handleEmailVerify}>Je vérifie mon address mail</Button>
        </Card>
    );
}
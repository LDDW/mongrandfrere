import { Button, Card } from "flowbite-react";
import { Link } from "react-router-dom";

export default function SendEmailVerify() {
    return (
        <Card className='w-[500px] absolute top-1/2 left-1/2 -translate-y-1/2 -translate-x-1/2'>
            <h5 className="text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Vérifiez votre adresse e-mail</h5>
            <p>Cliquez sur le lien que vous avez reçu pour vérifier votre adresse e-mail</p>
            <Link to="/">
                <Button>Retour à l'accueil</Button>
            </Link>
        </Card>
    );
}
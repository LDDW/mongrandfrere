import axios from "axios";
import { Card, Label, TextInput, Button } from "flowbite-react";
import { useState } from "react";
import { Link, useNavigate } from "react-router-dom";

export default function ForgottenPassword(){

    const [email, setEmail] = useState({
        email: ''
    });

    const [err, setError] = useState(false);

    const navigate = useNavigate();

    const handleSetEmail = (e) => {
        setEmail((prev) => ({ ...prev, [e.target.name]: e.target.value }));
    };

    const handleSubmit = () => {
        try {
            axios.post('http://localhost:3003/api/', email)
            navigate('/')
        } catch (error) {
            setError(true)
        }
    }

    return(
        <main className="bg-gray-100 w-full h-screen">
            <Card className='w-[500px] absolute top-1/2 left-1/2 -translate-y-1/2 -translate-x-1/2'>
                <form className="flex flex-col gap-4">
                    <h5 className="text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Mot de passe oublié ?</h5>
                    <p>Entrez votre adresse mail dans le champs ci-dessous pour réinitialiser votre mot de passe</p>
                    <div>
                        <div className="mb-2 block">
                            <Label htmlFor="email1" value="Email" />
                        </div>
                        <TextInput id="email1" name='email' type="email" placeholder="email" required={true} onChange={handleSetEmail}/>
                    </div>
                    <Button onClick={handleSubmit}>Réinitialiser mon mot de passe</Button>
                </form>
                <Link className="text-center text-sm text-blue-600 hover:underline dark:text-blue-500'" to='/connexion'>Retour</Link>
            </Card>
        </main>
    );
}
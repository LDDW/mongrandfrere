import { Button, Card, Label, TextInput, Checkbox } from 'flowbite-react';
import { useContext, useState } from 'react';
import { useNavigate, Link } from 'react-router-dom';
import { AuthContext } from '../context/AuthContext';
import LayoutsClient from '../layouts/LayoutsClient';


export default function Login(){

    const [inputs, setInputs] = useState({
        email:"",
        password:"",
    })

    const [err, setError] = useState(false);

    const navigate = useNavigate();

    const { login } = useContext(AuthContext);

    const handleChange = (e) => {
        setInputs((prev) => ({ ...prev, [e.target.name]: e.target.value }));
    };

    const handleSubmit = async e => {
        e.preventDefault();
        try {
            await login(inputs);
            navigate('/')
        } catch (error) {
            console.log(error);
            setError(true);
        }
    }

    return(
        <LayoutsClient>
            <Card className='w-[420px] absolute top-1/2 left-1/2 -translate-y-1/2 -translate-x-1/2'>
                <h5 className="text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Connexion</h5>
                <form className='flex flex-col gap-4'>

                    { err && <p>erreur</p> }

                    <div>
                        <div className="mb-2 block">
                            <Label htmlFor="email1" value="Email" />
                        </div>
                        <TextInput id="email1" name='email' type="email" placeholder="email" required={true} onChange={handleChange}/>
                    </div>

                    <div>
                        <div className="mb-2 block">
                        <Label htmlFor="password1" value="Mot de passe" />
                        </div>
                        <TextInput id="password1" name='password' type="password" placeholder="Mot de passe" required={true} onChange={handleChange}/>
                    </div>

                    <div className="flex items-center justify-between">
                        <div className="flex items-center gap-2">
                            <Checkbox id="remember" />
                            <Label htmlFor="remember">Se souvenir de moi</Label>
                        </div>
                        <Link to="/mot-de-passe-oublie" className='text-sm text-blue-600 hover:underline dark:text-blue-500'>Mot de passe oublié ?</Link>
                    </div>

                    <Button onClick={handleSubmit}>Connexion</Button>

                    <p className='text-center text-sm'> 
                        <span>Vous n'avez pas de compte ? </span> 
                        <Link to="/register" className='text-blue-600 hover:underline dark:text-blue-500'>Inscription</Link>
                    </p>
                </form>
            </Card>
        </LayoutsClient>
    );
}
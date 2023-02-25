import { Button, Card, Label, TextInput, Checkbox } from 'flowbite-react';
import { useState } from 'react';
import axios from 'axios';
import LayoutsClient from '../layouts/LayoutsClient';
import { Link, useNavigate } from 'react-router-dom';

export default function Login(){

    const [inputs, setInputs] = useState({
        lastname:"",
        firstname:"",
        email:"",
        phone:"",
        password:"",
        confirm_password: "",
    })

    const [err, setError] = useState(false);

    const navigate = useNavigate();

    const handleChange = (e) => {
        setInputs((prev) => ({ ...prev, [e.target.name]: e.target.value }));
    };

    const handleSubmit = async e => {
        e.preventDefault();
        try {
            await axios.post("http://localhost:3002/api/auth/register", inputs)
            navigate("/envoi-verification-email");
        } catch (error) {
            console.log(error);
            setError(true);
        }
    }

    return(
        <LayoutsClient>

            <Card className='w-[420px] absolute top-1/2 left-1/2 -translate-y-1/2 -translate-x-1/2'>
                <h5 className="text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Inscription</h5>
                <form className='flex flex-col gap-4'>

                    { err && <p>erreur</p> }

                    <div>
                        <div className="mb-2 block">
                            <Label htmlFor="lastname" value="Nom" />
                        </div>
                        <TextInput id="lastname" name='lastname' type="text" placeholder="Doe" required={true} onChange={handleChange}/>
                    </div>

                    <div>
                        <div className="mb-2 block">
                        <Label htmlFor="firstname" value="Prénom" />
                        </div>
                        <TextInput id="firstname" name='firstname' type="text" placeholder="John" required={true} onChange={handleChange}/>
                    </div>

                    <div>
                        <div className="mb-2 block">
                        <Label htmlFor="email" value="Email" />
                        </div>
                        <TextInput id="email" name='email' type="text" placeholder="doe.john@exemple.com" required={true} onChange={handleChange}/>
                    </div>

                    <div>
                        <div className="mb-2 block">
                        <Label htmlFor="password" value="Mot de passe" />
                        </div>
                        <TextInput id="password" name='password' type="password" placeholder="Mot de passe" required={true} onChange={handleChange}/>
                    </div>

                    <div>
                        <div className="mb-2 block">
                        <Label htmlFor="confirm-password" value="Confirmation du mot de passe" />
                        </div>
                        <TextInput id="confirm-password" name='confirm_password' type="password" placeholder="Confirmation du mot de passe" required={true} onChange={handleChange}/>
                    </div>

                    <div className="flex items-center gap-2">
                        <Checkbox id="remember" />
                        <Label htmlFor="agree">
                            <span>J'accepte </span>
                            <a href="/forms" className="text-blue-600 hover:underline dark:text-blue-500">les termes et conditions</a>
                        </Label>
                    </div>

                    <Button onClick={handleSubmit}>Inscription</Button>

                    <p className='text-center text-sm'> 
                        <span>Vous avez déjà un compte ? </span> 
                        <Link to="/login" className='text-blue-600 hover:underline dark:text-blue-500'>Connexion</Link>
                    </p>
                    
                </form>
            </Card>

        </LayoutsClient>
    );
}
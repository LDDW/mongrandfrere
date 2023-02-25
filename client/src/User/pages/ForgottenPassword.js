import axios from "axios";
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
            axios.post('http://localhost:3002/api/', email)
            navigate('/')
        } catch (error) {
            setError(true)
        }
    }

    return(
        <div>
            <form>
                <h1>Mot de passe oublié ?</h1>
                <p>Entrez votre adresse mail pour recevoir un code</p>
                <input type="email" name="email" placeholder="email" onChange={handleSetEmail}/>
                <button onClick={handleSubmit}>Réinitialiser mon mot de passe</button>
            </form>
            <Link to='/login'>Retour</Link>
        </div>
    );
}
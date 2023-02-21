import { useContext, useState } from 'react';
import { useNavigate } from 'react-router-dom';
import { AuthContext } from '../context/AuthContext';
import LayoutsClient from '../layouts/LayoutsClient';

export default function Login(){

    const [inputs, setInputs] = useState({
        email:"",
        password:"",
    })

    // const [err, setError] = useState(false);

    const navigate = useNavigate();

    const { login } = useContext(AuthContext);

    const handleChange = (e) => {
        setInputs((prev) => ({ ...prev, [e.target.name]: e.target.value }));
    };

    const handleSubmit = async e => {
        e.preventDefault();
        try {
            await login(inputs)
            navigate('/')
        } catch (error) {
            console.log(error);
            // setError(true);
        }
    }

    return(
        <LayoutsClient>
            <h1>Login</h1>
            <form>
                <input type="email" placeholder="email" name='email' onChange={handleChange}/>
                <input type="password" placeholder="password" name='password' onChange={handleChange}/>
                <button onClick={handleSubmit}>Connexion</button>
            </form>
        </LayoutsClient>
    );
}
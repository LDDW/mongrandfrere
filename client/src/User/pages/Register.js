import { useState } from 'react';
import axios from 'axios';
import LayoutsClient from '../layouts/LayoutsClient';
import { useNavigate } from 'react-router-dom';

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
            <h1>Register</h1>
            <form>
                <input type="text" placeholder="lastname" name='lastname' onChange={handleChange}/>
                <input type="text" placeholder="firstname" name='firstname' onChange={handleChange}/>
                <input type="email" placeholder="email" name='email' onChange={handleChange}/>
                <input type="tel" placeholder="phone" name='phone' onChange={handleChange}/>
                <input type="password" placeholder="password" name='password' onChange={handleChange}/>
                <input type="password" placeholder="confirm password" name='confirm_password' onChange={handleChange}/>
                <button onClick={handleSubmit}>Register</button>
                {err && <p>erreur</p>}
            </form>
        </LayoutsClient>
    );
}
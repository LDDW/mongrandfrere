import axios from 'axios';
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
        <>
            <button onClick={handleEmailVerify}>Vérifier mon address mail</button>
        </>
    );
}
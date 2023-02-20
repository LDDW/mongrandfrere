import axios from 'axios';
import { useNavigate } from 'react-router-dom';

export default function EmailVerify(){
    const token = new URLSearchParams(window.location.search).get("token");
    const navigate = useNavigate();

    const handleEmailVerify = async (e) => {
        try {
            await axios.post("http://localhost:3002/api/auth/register", token);
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
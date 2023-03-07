import { BrowserRouter,  Routes, Route } from 'react-router-dom';

import Home from './User/pages/Home';
import About from './User/pages/About';
import Formations from './User/pages/Formations';
import News from './User/pages/News';
import Login from './User/pages/Login';
import Register from './User/pages/Register';
import EmailVerify from './User/pages/emails/EmailVerify';
import SendEmailVerify from './User/pages/emails/SendEmailVerify';
import PageNoFound from './User/pages/PageNoFound';
import ForgottenPassword from './User/pages/ForgottenPassword';
import Account from './User/pages/Account';

function App() {
  return (
    <BrowserRouter>
      <Routes>
        <Route path='/' element={<Home/>}/>
        <Route path='/formations' element={<Formations/>}/>
        <Route path='/actualités' element={<News/>}/>
        <Route path='/qui-sommes-nous' element={<About/>}/>
        {/* ACCOUNT */}
        <Route path='/connexion' element={<Login/>}/>
        <Route path='/inscription' element={<Register/>}/>
        <Route path='/mot-de-passe-oublie' element={<ForgottenPassword/>}/>
        <Route path='/mon-compte' element={<Account/>}/>
        {/* EMAILS */}
        <Route path='/verification-email' element={<EmailVerify/>}/>
        <Route path='/envoi-verification-email' element={<SendEmailVerify />}/>
        <Route path='*' element={<PageNoFound/>} />
      </Routes>
    </BrowserRouter>
  );
}

export default App;

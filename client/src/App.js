import { BrowserRouter,  Routes, Route } from 'react-router-dom';

import Home from './User/pages/Home';
import About from './User/pages/About';
import Formations from './User/pages/Formations';
import News from './User/pages/News';
import Login from './User/pages/Login';
import EmailVerify from './User/pages/emails/EmailVerify';
import SendEmailVerify from './User/pages/emails/SendEmailVerify';

function App() {
  return (
    <div>
      <BrowserRouter>
        <Routes>
          <Route path='/' element={<Home/>}/>
          <Route path='/formations' element={<Formations/>}/>
          <Route path='/actualités' element={<News/>}/>
          <Route path='/qui-sommes-nous' element={<About/>}/>
          <Route path='/login' element={<Login/>}/>
          <Route path='/register' element={<Login/>}/>
          {/* EMAILS */}
          <Route path='/verification-email' element={<EmailVerify/>}/>
          <Route path='/envoi-verification-email' element={<SendEmailVerify />}/>
        </Routes>
      </BrowserRouter>
    </div>
  );
}

export default App;

import { BrowserRouter,  Routes, Route } from 'react-router-dom';

import Home from './User/pages/Home';
import About from './User/pages/About';
import Formations from './User/pages/Formations';
import News from './User/pages/News';
import Login from './User/pages/Login';

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
        </Routes>
      </BrowserRouter>
    </div>
  );
}

export default App;

import React from 'react';
import { BrowserRouter } from 'react-router-dom';
import AppRouter from './components/AppRouter';
import FooterBar from './components/UI/Footer/FooterBar';
import Navbar from './components/UI/Header/Navbar';

function App() {
  return (
    <div className="App" draggable="false">
      <BrowserRouter>
        <AppRouter/>
      </BrowserRouter>
    </div>
  );
}

export default App;

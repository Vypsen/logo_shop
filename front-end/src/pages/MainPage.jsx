import React from 'react'
import '../styles/App.css'
import { BrowserRouter, Route, Routes } from 'react-router-dom'
import BasketPage from './BasketPage'
import Navbar from '../components/UI/Header/Navbar'
import FooterBar from '../components/UI/Footer/FooterBar'
import Catalog from './Catalog'

const MainPage = () => {

    return (
        <div>
            <Catalog/>

        </div>
    )
}

export default MainPage
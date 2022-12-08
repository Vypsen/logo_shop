import React from 'react'
import { Outlet } from 'react-router-dom'
import FooterBar from './UI/Footer/FooterBar'
import Navbar from './UI/Header/Navbar'

const Layout = () => {
    return (
        <>
            <Navbar />
                <Outlet/>
            <FooterBar/>
        </>
    )
}

export default Layout;
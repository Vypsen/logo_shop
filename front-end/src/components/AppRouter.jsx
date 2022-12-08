import React from 'react';
import { Navigate, Route, Routes } from "react-router-dom";
import AboutPage from '../pages/AboutPage';
import BasketPage from '../pages/BasketPage';
import Catalog from '../pages/Catalog';
import CheckoutPage from '../pages/CkeckoutPage';
import MainPage from '../pages/MainPage';
import NotFoundPage from '../pages/NotFoundPage';
import OrderPage from '../pages/OrderPage';
import ProductPage from '../pages/ProductPage';
import Layout from './Layout';

const AppRouter = () => {

    return (
        <div>
            <Routes>
                <Route path='/' element={<Layout/>}>
                    <Route index element={<MainPage/>}/>
                    <Route path='basket_page' element={<BasketPage/>}/>
                    <Route path='catalog' element={<Catalog/>}/>
                    <Route path='poducts' element={<ProductPage/>}/>
                    <Route path='checkout' element={<CheckoutPage/>}/>
                    <Route path='order' element={<OrderPage/>}/>
                    <Route path='about' element={<AboutPage/>}/>
                    <Route path='*' element={<NotFoundPage/>}/>
                </Route>
            </Routes>
        </div>
    )
}

export default AppRouter;
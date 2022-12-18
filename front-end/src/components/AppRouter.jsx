import React from 'react';
import '../styles/App.css'
import { Route, Routes } from "react-router-dom";
import AboutPage from '../pages/AboutPage';
import BasketPage from '../pages/BasketPage';
import Catalog from '../pages/Catalog';
import CheckoutPage from '../pages/CkeckoutPage';
import MainPage from '../pages/MainPage';
import NotFoundPage from '../pages/NotFoundPage';
import OrderPage from '../pages/OrderPage';
import ProductPage from '../pages/ProductPage';
import Layout from './Layout';
import SucessfullApplication from '../pages/SucessfullApplicationPage';
import { FavoritePage } from '../pages/FavoritePage';

const AppRouter = () => {

    return (
        <div>
            <Routes>
                <Route path='/' element={<Layout/>}>
                    <Route index element={<MainPage/>}/>
                    <Route path='basket_page' element={<BasketPage/>}/>
                    <Route path='catalog/*' element={<Catalog/>}/>
                    <Route path='catalog/:page' element={<Catalog/>}/>
                    <Route path='catalog/:category/:page' element={<Catalog/>}/>
                    <Route path='product_details/:slug' element={<ProductPage/>}/>
                    <Route path='checkout' element={<CheckoutPage/>}/>
                    <Route path='order' element={<OrderPage/>}/>
                    <Route path='about' element={<AboutPage/>}/>
                    <Route path='order_success' element={<SucessfullApplication/>}/>
                    <Route path='favourites' element={<FavoritePage/>}/>
                    <Route path='*' element={<NotFoundPage/>}/>
                </Route>
            </Routes>
        </div>
    )
}

export default AppRouter;
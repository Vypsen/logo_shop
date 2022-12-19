import React, { useEffect } from 'react'
import { useNavigate } from 'react-router-dom'
import BasketAPI from '../API/BasketAPI'
import { useFetching } from '../components/hooks/useFetching'
import { AboutOrderCard } from '../components/UI/AboutOrderCard/AboutOrderCard'
import BasketProductCard from '../components/UI/BasketProductCard/BasketProductCard'
import SquareSmallPlate from '../components/UI/SquareSmallPlate/SquareSmallPlate'

import '../styles/BasketPage.css'

const BasketPage = () => {

    const navigate = useNavigate()

    const [fetchCartData, isCartDataLoading, errorData] = useFetching(async () => {
        const response = await BasketAPI.getCartData()
    })

    
    useEffect(() => {
      fetchCartData()
    }, [])
    

    return (
        <div className='basketPageContentWrapper'>
            <div className='linkTreeWrapper'>
                <div className='linkBackTo' onClick={() => navigate(-1)}>
                    <svg width="14" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path opacity="0.8" d="M5 1L1 5L5 9" stroke="#616575" strokeLinecap="round"/>
                    </svg>
                    <div>
                        Вернуться в каталог
                    </div>
                </div>
                <svg width="1" height="22" viewBox="0 0 1 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <line x1="0.65" y1="22" x2="0.649999" y2="1.5299e-08" stroke="#CDCFD6" strokeWidth="0.7"/>
                </svg>
                <div className='titleBasket'>
                    Корзина
                </div>
            </div>

            <div className='basketMainContentWrapper'>

                <div className='basketProductsWrapper'>
                    <BasketProductCard/>
                    <BasketProductCard/>
                    <BasketProductCard/>
                    <BasketProductCard/>
                    <BasketProductCard/>
                    <BasketProductCard/>
                    <BasketProductCard/>
                    <BasketProductCard/>
                    <BasketProductCard/>
                    <BasketProductCard/>
                    <BasketProductCard/>
                </div>

                <AboutOrderCard title='Ваша корзина' buttonName='Оформить заказ' navigationAdress='/checkout'/>
            </div>
        </div>
    )
}

export default BasketPage
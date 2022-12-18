import React from 'react'
import { useNavigate } from 'react-router-dom'

import aoc from './AboutOrderCard_style.module.css'

export const AboutOrderCard = ({title="", buttonName="Отправить заявку", navigationAdress="/"}) => {

    const navigate = useNavigate()

    return (
        <div className={aoc.yourBasketContentWrapper}>
            <div className={aoc.yourBasketTitle}>
                {title}
            </div>
            <svg width="175" height="1" viewBox="0 0 175 1" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect width="175" height="1" fill="#CDCFD6"/>
            </svg>
            <div className={aoc.yourBasketCounterWrapper}>
                <div className={aoc.yourBasketCountentWrapperElements}>
                    <div className={aoc.yourBasketNumsOfText}>
                        Кол-во товаров:
                    </div>
                    <div>amountOf</div>
                </div>
                <div className={aoc.yourBasketCountentWrapperElements}>
                    <div className={aoc.yourBasketSumOfText}>
                        Сумма: 
                    </div>
                    <div>
                        Sum
                    </div>
                </div> 
            </div>
            <svg width="175" height="1" viewBox="0 0 175 1" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect width="175" height="1" fill="#CDCFD6"/>
            </svg>
            <div className={aoc.yourBasketTotal}>
                <div className={aoc.numsWrapper}>
                    <div className={aoc.totalStyleText}>
                        Итого:
                    </div>
                    <div>
                        24 000 ₽
                    </div>
                </div>
            </div>
            <div className={aoc.placeAnOrderBtn} onClick={() => navigate(navigationAdress)}>
                <div>
                    {buttonName}
                </div>
            </div>
        </div>
    )
}
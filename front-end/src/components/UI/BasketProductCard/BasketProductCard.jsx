import React from 'react';
import bpc from './BasketProductCard_style.module.css'

const BasketProductCard = ({children, ...props}) => {

    return (
        <div className={bpc.basketProductContentWrapper}>
            <div className={bpc.productCardBasket}>
                <div>
                    <img src="https://via.placeholder.com/145x145"/>
                </div>
                <div className={bpc.basketProductInfoWrapper}>
                    <h1 className={bpc.basketProductTitle}>
                        Жакет Weekend Max Mara ONDINA
                    </h1>
                    <div className={bpc.basketProductSizeWrapper}>
                        <div className={bpc.basketText}>
                            Размер:
                        </div>
                        <div>
                            40-42
                        </div>
                    </div>
                    <div className={bpc.amountAndCostWrapper}>
                        <div className={bpc.amountAndCostColumnWrapper}>
                            <div className={bpc.basketText}>
                                Количество
                            </div>
                            <div>
                                counter
                            </div>
                        </div>
                        <div className={bpc.amountAndCostColumnWrapper}>
                            <div className={bpc.basketText}>
                                Стоимость
                            </div>
                            <div>
                                27 000 ₽
                            </div>
                        </div>
                    </div>
                </div>
                <div className={bpc.exitBtn}>
                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12.59 0L7 5.59L1.41 0L0 1.41L5.59 7L0 12.59L1.41 14L7 8.41L12.59 14L14 12.59L8.41 7L14 1.41L12.59 0Z" className={bpc.exBtnColor} />
                    </svg>
                </div>
            </div>
        </div>
    )
}

export default BasketProductCard;
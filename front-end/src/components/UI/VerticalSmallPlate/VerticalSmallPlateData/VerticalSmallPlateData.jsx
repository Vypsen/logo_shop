import React from 'react';

import './VerticalSmallPlateData_style.css'

export const VerticalSmallPlateData = ({children}) => {
    return (
        <div className='cntFPS'>
            <div className='cntFPS_main'>
                {children}
            </div>
            <div className='cntFPS_secondary'>
                <div className='fpsSizes'>
                    <h2 className='chooseSizeText'>Выберите размер</h2>
                    <div className='chooseSizeBoxes'>
                        <div className='sizeBox'>XS</div>
                        <div className='sizeBox'>S</div>
                        <div className='sizeBox'>M</div>
                        <div className='sizeBox'>L</div>
                        <div className='sizeBox'>XL</div>
                    </div>
                </div>
                <button className='toCartBtn'>В корзину</button>
            </div>
        </div>
    )
}
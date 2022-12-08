import React from 'react';
import './SquareSmallPlate_style.css'

const SquareSmallPlate = ({children}) => {
    return (
        <div className='squarePlate'>
            <div>
                {children}
            </div>
        </div>
    )
}

export default SquareSmallPlate;
import React from 'react'
import './VerticalSmallPlate_style.css'


const VerticalSmallPlate = ({children}) => {
    return (
        <div className='vetricalPlate'>
            <div className='verticalPlateWrapper'>
                {children}
            </div>
        </div>
    )
}

export default VerticalSmallPlate;
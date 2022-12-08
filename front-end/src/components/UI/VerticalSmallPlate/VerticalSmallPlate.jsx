import React from 'react'
import './VerticalSmallPlate_style.css'


const VerticalSmallPlate = ({children, ...props}) => {
    return (
        <div className='vetricalPlate'>
            <div className='verticalPlateWrapper'>
                {children}
            </div>
        </div>
    )
}

export default VerticalSmallPlate;
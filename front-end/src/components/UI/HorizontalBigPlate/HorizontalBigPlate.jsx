import React from 'react'
import './HorizontalBigPlate_style.css'


const HorizontalBigPlate = ({children, ...props}) => {
    return (
        <div className='bigPlate' {...props}>
            <div className='bigPlateWrapper'>
                {children}
            </div>
        </div>
    )
}

export default HorizontalBigPlate;
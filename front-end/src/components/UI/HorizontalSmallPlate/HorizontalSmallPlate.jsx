import React from 'react';
import './HorizontalSmallPlate_style.css'

const HorizontalSmallPlate = ({children, ...props}) => {
    return (
        <div className='smallPlate' {...props}>
            <div className='smallPlateWrapper'>
                {children}
            </div>
        </div>
    )
}

export default HorizontalSmallPlate;
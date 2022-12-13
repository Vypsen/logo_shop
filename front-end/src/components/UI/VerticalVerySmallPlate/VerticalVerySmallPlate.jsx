import React from 'react'
import vvsmp from './VerticalVerySmallPlate_style.module.css'

const VerticalVerySmallPlate = ({children, ...props}) => {

    return (
        <div className={vvsmp.vetricalVerySmallPlate} {...props}>
            <div className={vvsmp.verticalVerySmallPlateWrapper}>
                {children}
            </div>
        </div>
    )
}

export default VerticalVerySmallPlate
import React from 'react'
import './LandingSlidePlate_style.css'

const LandingSlidePlate = ({children, ...props}) => {
    return (
        <div {...props}>
            {children}
        </div>
    )
}

export default LandingSlidePlate;
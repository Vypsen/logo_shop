import React from 'react'
import { useState } from 'react'
import cc from './ColorCircles_style.module.css'

const ColorCircle = ({colorName, colorsState = []}) => {

    const [colorIsActive, setColorIsActive] = useState(false)
    
    let rootClassesCircles = cc.colorCircleStrokeDisabled

    const colorSelected = () => {
        colorIsActive ? setColorIsActive(false) : setColorIsActive(true)
    }

    // if (colorIsActive) 
    // {
    //     rootClassesCircles = cc.colorCircleStrokeActive
    // }

    if(colorIsActive) {       
        colorsState.map((cS) =>
        {
            if(cS.col == colorName && cS.st == true)
            {
                rootClassesCircles = cc.colorCircleStrokeActive
                // console.log(colorsState)
            }
            else if (cS.col == colorName && cS.st == false){
                rootClassesCircles = cc.colorCircleStrokeDisabled
                setColorIsActive(false)
                // console.log(colorsState)
            }
        })
    }

    return (
        <div onClick={() => colorSelected()}>
            <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="16" cy="16" r="15" fill={colorName} stroke="#616575" className={rootClassesCircles}/>
            </svg>
        </div>
    )
}

export default ColorCircle;
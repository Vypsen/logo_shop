import React from 'react'
import { useState } from 'react';

import cjs from './Counter_style.module.css'

const Counter = ({value, setValue, onChange}) => {

    const [count, setCount] = useState(1)

    function increment() {
        // setCount(count + 1)
        // value = count
        setValue(value + 1)
    }

    function decrement() {
        if (value > 1) {
            // setCount(count - 1)
            setValue(value - 1)
        }
        // value = count
        // console.log(value)
    }

    return (
        <div className={cjs.counterWrapper}>
            <button className={cjs.counterWrapperButtonDec} onClick={decrement}>
            <svg width="10" height="3" viewBox="0 0 10 3" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect y="0.75" width="10" height="1.5" fill="#515562"/>
            </svg>

            </button>
            {/* <textarea value={value} onChange={event => onChange(event.target.value)} disabled>{value}</textarea> */}
            <h1
                value={value}
                onChange={event => onChange(event.target.count)}
            >
                {value}
            </h1>

            <button className={cjs.counterWrapperButtonInc} onClick={increment}>
            <svg width="10" height="11" viewBox="0 0 10 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect y="4.75" width="10" height="1.5" fill="#515562"/>
                <rect x="5.75" y="0.5" width="10" height="1.5" transform="rotate(90 5.75 0.5)" fill="#515562"/>
            </svg>

            </button>
        </div>
    )
}

export default Counter;
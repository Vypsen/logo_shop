import React from 'react'
import { useState } from 'react';

import cjs from './Counter_style.module.css'

const Counter = () => {

    const [count, setCount] = useState(1)

    function increment() {
        setCount(count + 1)
    }

    function decrement() {
        if (count > 1)
            setCount(count - 1)
    }

    return (
        <div className={cjs.counterWrapper}>
            <button className={cjs.counterWrapperButtonDec} onClick={decrement}>
            <svg width="10" height="3" viewBox="0 0 10 3" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect y="0.75" width="10" height="1.5" fill="#515562"/>
            </svg>

            </button>

            <h1>{count}</h1>

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
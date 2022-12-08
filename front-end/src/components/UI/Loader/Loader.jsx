import React from 'react';
import './Loader.css'

const Loader = ({...props}) => {
    return (
        <div {...props}>
            <div className='lds-ripple'>
                <div></div>
                <div></div>
            </div>
        </div>
    )
}

export default Loader;
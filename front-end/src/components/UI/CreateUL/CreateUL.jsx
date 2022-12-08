import React from 'react'

const CreateUL = ({children, firstStyle, secondStyle, data, func, mode = 0}) => {

    if (mode === 0) {
        return (
            <div>
                <ul className={firstStyle}>
                    {data.map((i) => 
                        <li key={i} className={secondStyle}>{i}</li>
                    )}
                    {children}
                </ul>
            </div>
        );
    }
    else if (mode === 1) {
        return (
            <div>
                <ul className={firstStyle}>
                    {data.map((i) => 
                        <li key={i} className={secondStyle} onClick={() => func(i)}>{i}</li>
                    )}
                    {children}
                </ul>
            </div>
        );
    }
    
}

export default CreateUL;
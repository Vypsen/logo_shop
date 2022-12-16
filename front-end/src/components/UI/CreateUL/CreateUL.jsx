import React from 'react'
import { Link } from 'react-router-dom';

const CreateUL = ({children, firstStyle, secondStyle, data, func, mode = 0}) => {
    // console.log(data)
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
    else if (mode === 2) {
        return (
            <div>
                <ul className={firstStyle}>
                    {data.map((i) => 
                        <Link key={i.id} to={'/catalog/' + i.slug + "/1"}>
                            <li className={secondStyle}>{i.name}</li>
                        </Link>
                    )}
                    {children}
                </ul>
            </div>
        );
    }
    
}

export default CreateUL;
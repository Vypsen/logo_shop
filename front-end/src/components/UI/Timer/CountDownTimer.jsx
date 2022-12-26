import React, { useEffect, useRef, useState } from 'react';

export const CountDounTimer = ({TimerValue = '00:00:10', TimerSeconds = 10, value, setValue, onChange, Visible = true}) => {
    
    const timerRef = useRef(null)

    const [timer, setTimer] = useState('00:00:00')

    const getTimeRemaining = (e) => {
        const total = Date.parse(e) - Date.parse(new Date())
        const seconds = Math.floor((total / 1000) % 60);
        const minutes = Math.floor((total / 1000 / 60) % 60);
        const hours = Math.floor((total / 1000 / 60 / 60) % 24);
        return {
            total, hours, minutes, seconds
        };
    }    

    const startTimer = (e, tm_id) => {
        let { total, hours, minutes, seconds } = getTimeRemaining(e);
        if (total >= 0) {
  
            // update the timer
            // check if less than 10 then we need to 
            // add '0' at the beginning of the variable
            setTimer(
                (hours > 9 ? hours : '0' + hours) + ':' +
                (minutes > 9 ? minutes : '0' + minutes) + ':'
                + (seconds > 9 ? seconds : '0' + seconds)
            )
            setValue(
                (hours > 9 ? hours : '0' + hours) + ':' +
                (minutes > 9 ? minutes : '0' + minutes) + ':'
                + (seconds > 9 ? seconds : '0' + seconds)
            )
        }
        else{
            clearInterval(tm_id)
        }
    }
    
    const clearTimer = (e) => {
  
        // If you adjust it you should also need to
        // adjust the Endtime formula we are about
        // to code next    
        setTimer(TimerValue);
        // If you try to remove this line the 
        // updating of timer Variable will be
        // after 1000ms or 1sec
        if (timerRef.current) clearInterval(timerRef.current);
        const id = setInterval(() => {
            startTimer(e, id);
        }, 1000)
        
        timerRef.current = id;
    }

    const getDeadTime = () => {
        let deadline = new Date();
        // This is where you need to adjust if 
        // you entend to add more time
        deadline.setSeconds(deadline.getSeconds() + TimerSeconds);
        return deadline;
    }

    useEffect(() => {
        clearTimer(getDeadTime());
    }, []);

    const onClickReset = () => {
        clearTimer(getDeadTime());
    }

    return (
        <>
            {Visible
            ?
                <h2
                    value={value}
                    onChange={event => onChange(event.target.value)}
                >
                    {value}
                </h2>
            :
                <>
                </>
            }
        </>
    )
}
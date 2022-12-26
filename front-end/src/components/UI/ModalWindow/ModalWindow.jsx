import React from 'react';
import mw from './ModalWindow_style.module.css'

export const ModalWindow = ({children, visible, setVisible}) => {

    const rootClasses = [mw.modalWindow]

    if (visible) {
        rootClasses.push(mw.active);
    }

    return (
        <div className={rootClasses.join(' ')} onClick={() => setVisible(false)}>
            <div className={mw.modalWindowContent} onClick={(e) => e.stopPropagation()}>
                {children}
            </div>
        </div>
    );
}   
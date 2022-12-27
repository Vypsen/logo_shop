import React from 'react';
import mw from './ModalWindow_style.module.css'

export const ModalWindow = ({children, visible, setVisible, ...props}) => {

    const SomeModifiedStyle = [mw.modalWindowContent]

    const rootClasses = [mw.modalWindow]

    if (visible) {
        rootClasses.push(mw.active);
    }

    if (props.CN === 'test214')
    {
        SomeModifiedStyle.push(mw.test214)
    }

    return (
        <div className={rootClasses.join(' ')} onClick={() => setVisible(false)}>
            <div className={SomeModifiedStyle.join(' ')} onClick={(e) => e.stopPropagation()}>
                {children}
            </div>
        </div>
    );
}   
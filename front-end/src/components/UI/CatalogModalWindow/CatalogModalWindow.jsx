import React from 'react';
import cmw from './CatalogModalWindow.module.css'

export const CatalogModalWindow = ({children, visible, setVisible}) => {

    const rootClasses = [cmw.catalogModalWindow]

    if (visible) {
        rootClasses.push(cmw.active);
    }

    return (
        <div className={rootClasses.join(' ')} onClick={() => setVisible(false)}>
            <div className={cmw.catalogModalWindowContent} onClick={(e) => e.stopPropagation()}>
                {children}
            </div>
        </div>
    );
}   
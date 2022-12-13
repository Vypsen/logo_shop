import React from 'react'
import vsp from './VerticalSmallPlate_style.module.css'


const VerticalSmallPlate = ({children, isNew = false, isSale = false, ...props}) => {

    const newLabel = isNew;
    const saleLabel = isSale;
    const rootClassesSaleLabel = [vsp.verticalPlateWrapperSale]
    if (!newLabel) {
        rootClassesSaleLabel.push(vsp.NewFalse)
    }

    return (
        <div className={vsp.vetricalPlate} {...props}>
            <div className={vsp.verticalPlateWrapper}>
                <div className='labelsWrapper'>
                    {newLabel ? <div className={vsp.verticalPlateWrapperNew}> <div>New</div> </div> : <div></div>}
                    {saleLabel ? <div className={rootClassesSaleLabel.join(' ')}> <div>Sale</div> </div> : <div></div>}
                </div>
                {children}
            </div>
        </div>
    )
}

export default VerticalSmallPlate;
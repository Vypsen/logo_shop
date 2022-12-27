import React from 'react'
import vsp from './VerticalSmallPlate_style.module.css'


const VerticalSmallPlate = ({children, isNew = false, isSale = false, isSmartVersion = false, ...props}) => {

    const newLabel = isNew;
    const saleLabel = isSale;
    const rootClassesSaleLabel = [vsp.verticalPlateWrapperSale]
    if (!newLabel) {
        rootClassesSaleLabel.push(vsp.NewFalse)
    }

    if (isSmartVersion == false)
    {
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
    else if (isSmartVersion == true) {
        return (
            <div className={vsp.transitionScale}>
                <div className={vsp.vetricalPlate } {...props}>
                    <div className={vsp.verticalPlateWrapper}>
                        <div className='labelsWrapper '>
                            {newLabel ? <div className={vsp.verticalPlateWrapperNew}> <div>New</div> </div> : <div></div>}
                            {saleLabel ? <div className={rootClassesSaleLabel.join(' ')}> <div>Sale</div> </div> : <div></div>}
                        </div>
                        {children}
                    </div>
                </div>
            </div>

        )
    }
}

export default VerticalSmallPlate;
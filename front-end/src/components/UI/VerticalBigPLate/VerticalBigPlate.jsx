import React from 'react';
import vbp from './VerticalBigPlate_style.module.css'

const VerticalBigPlate = ({children, isNew = false, isSale = false, ...props}) => {

    const newLabel = isNew
    const saleLabel = isSale
    const rootClassesSaleLabelVBP = [vbp.verticalBigPlateWrapperSale] 
    if (!newLabel) {
        rootClassesSaleLabelVBP.push(vbp.NewFalse)
    }

    return (
        <div className={vbp.verticalBigPlate} {...props}>
            <div className={vbp.verticalBigPlateWrapper}>
                <div className={vbp.verticalBigPlateLabelsWrapper}>
                    {/* <div className={vbp.verticalBigPlateWrapperNew}>
                        <div>
                            New
                        </div>
                    </div>
                    <div className={vbp.verticalBigPlateWrapperSale}>
                        <div>
                            Sale
                        </div>
                    </div> */}
                    {newLabel ? <div className={vbp.verticalBigPlateWrapperNew}> <div>New</div> </div> : <div></div>}
                    {saleLabel ? <div className={rootClassesSaleLabelVBP.join(' ')}> <div>Sale</div> </div> : <div></div>}
                </div>
                {children}
            </div>
        </div>
    )
}

export default VerticalBigPlate
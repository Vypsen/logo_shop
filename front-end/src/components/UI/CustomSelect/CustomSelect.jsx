import React from 'react'
import custSel from './CustomSelect_style.module.css'

const CustomSelect = ({options, value, onChange, defaultValue=''}) => {

    return (
        <select
            value={value}
            onChange={event => onChange(event.target.value)}
            className={custSel.CustomSelectorSizeStyle}
        >
            <option disabled value="" className={custSel.CustomOptionInvisible}>{defaultValue}</option>
            {options.map((op) => 
                <option key={op.id} value={op.size_name}>
                    {op.size_name}
                    </option>
            )}
        </select>
    )
}

export default CustomSelect;
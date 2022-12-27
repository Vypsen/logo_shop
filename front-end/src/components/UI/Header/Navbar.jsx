import React from 'react'
import { useState } from 'react';
import { Link, useNavigate } from 'react-router-dom';
import { SvgSelector } from '../../../utils/SVG/SvgSelector';
import { CatalogModalWindow } from '../CatalogModalWindow/CatalogModalWindow';
import './Navbar_style.css'
import { icons } from '../../../store/constants';
import CatalogContent from './CatalogContent/CatalogContent';
import MainPage from '../../../pages/MainPage';
import { ModalWindow } from '../ModalWindow/ModalWindow';
import { AuthContent } from '../../../pages/AuthContent';

const Navbar = () => {

    const navigate = useNavigate()

    const [catalogModal, setCatalogModal] = useState(false);
    const [modalWindow, setModalWindow] = useState(false)

    const [searcherValue, setSearcherValue] = useState('')

    const authBtn = () => {
        modalWindow ? setModalWindow(false) : setModalWindow(true)
    }
    const catalogBtn = () => {
        catalogModal ? setCatalogModal(false) : setCatalogModal(true)
    }

    const searchFun = (event) => {
        event.preventDefault();
        navigate("/search/1/" + searcherValue)
    }

    let arr = []
    for (let i = 0; i < 10; i++)
    {
        arr.push(i + 1)
    }

    return (
        <header>
            <CatalogModalWindow visible={catalogModal} setVisible={setCatalogModal}>
                <CatalogContent/>
            </CatalogModalWindow>
            <ModalWindow visible={modalWindow} setVisible={setModalWindow}>
                <AuthContent/>
            </ModalWindow>
            <div className='navbar'>
                <div className='navbar__up' onClick={() => setCatalogModal(false)}>
                    <div className='navbar__links'>
                        <Link className='white_underlined__text'>Контакты</Link>
                        <Link to={"about"}className='white_underlined__text'>О нас</Link>
                        <Link className='white_underlined__text'>Доставка</Link>
                    </div>
                    <div className='navbar__links'>
                        <div className='mediaIcon__up'>
                            <SvgSelector id={icons[0]}/>
                            <a href="http://avito.ru" className='white_underlined__text'>logo</a>
                        </div>
                        <div className='mediaIcon__up'>
                            <SvgSelector id={icons[1]}/>
                            <a href="https://www.whatsapp.com/" className='white_underlined__text'>Написать нам</a>
                        </div>
                    </div>
                </div>

                <div className='navbar__down'>
                    <div className='navbar__items'>
                        <Link to="/">
                            <div className='logo'>
                                <SvgSelector id={icons[5]}/>
                            </div>
                        </Link>
                        <div className='search_catalog_wrapper'>                        
                            <div className='catalog_btn' onClick={() => catalogBtn()}>
                                <SvgSelector id={icons[6]}/>
                            </div>
                            <div onClick={() => setCatalogModal(false)}>
                                <form onSubmit={searchFun}><div className='searchIconClickStyle' onClick={searchFun}/>
                                    <SvgSelector id={icons[7]}/>
                                    <input 
                                        className='searchfield'
                                        value={searcherValue}
                                        onChange={e => setSearcherValue(e.target.value)}
                                    />
                                </form>
                            </div>  
                        </div>
                    </div>
                    <div className='navbar__items' onClick={() => setCatalogModal(false)}>
                        <div className='mediaIcon__down'>
                            <SvgSelector id={icons[2]}/>
                            <div><Link to="favourites" className='grey_underlined__text'>Избранное</Link></div>
                        </div>
                        <div className='mediaIcon__down'>
                            <SvgSelector id={icons[3]}/>
                            {/* <div>
                                <Link className='grey_underlined__text'>Вход/Регистрация</Link>
                            </div> */}
                            <div className='grey_underlined__text' onClick={() => authBtn()}>
                                Вход/Регистрация
                            </div>
                        </div>
                        <div className='mediaIcon__down'>
                            <SvgSelector id={icons[4]}/>
                            <Link to="/basket_page" style={{width: 100}} className='grey_underlined__text'>500000 P / 5 шт</Link>
                        </div>
                    </div>
                </div>
                <hr className='hr__line'></hr>
            </div>
        </header>
    );
}

export default Navbar;
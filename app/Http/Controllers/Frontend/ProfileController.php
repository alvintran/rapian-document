<?php

namespace Nht\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use Nht\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Nht\Hocs\Core\Metadata\MetadataTrait;
use Nht\Http\Requests\ProfileFormRequest;
use Nht\Hocs\Core\Images\ImageFactory;

class ProfileController extends Controller
{
    use MetadataTrait;

    protected $auth;

    /**
     * Constructor
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
        $this->getMetadata();
    }

    /**
     * Trang thông tin cá nhân
     *
     * @return View
     */
    public function index()
    {
        $this->metadata->setMetaTitle('Thông tin cá nhân');
        return view('frontend/profiles/index')->with('user', $this->auth->user());
    }

    /**
     * Cập nhật thông tin cá nhân
     *
     * @return Redirect
     */
    public function updateProfile(ProfileFormRequest $request, ImageFactory $uploader)
    {
        $info = [
            'name' => $request->get('name'),
            'nickname' => $request->get('nickname'),
            'phone' => $request->get('phone'),
            'address' => $request->get('address')
        ];

        if ($request->hasFile('avatar'))
        {
            $fn = $uploader->upload('avatar', public_path() . '/uploads/users', [], 'crop');
            $info['avatar'] = $fn['filename'];
        }

        $currentUser = $this->auth->user();
        $result = $currentUser->fill($info)->save();

        if ($result)
        {
            return redirect()->to('/profile')->with('success', 'Thông tin đã được cập nhật!');
        }
        return redirect()->back()->with('error', 'Có lỗi xẩy ra, vui lòng thử lại!');
    }

    /**
     * Trang đổi mật khẩu
     *
     * @return View
     */
    public function changePassword()
    {
        $this->metadata->setMetaTitle('Đổi mật khẩu');
        return view('frontend/profiles/change-password');
    }

    /**
     * Thực hiện đổi mật khẩu cho user
     * @return [type] [description]
     */
    public function postChangePassword(Request $request)
    {
        $this->validate($request, [
            'old_password' => 'required',
            'password' => 'required|confirmed|min:6'
        ], [
            'old_password.required' => 'Nhập mật khẩu cũ',
            'password.required' => 'Nhập mật khẩu mới',
            'password.confirmed' => 'Xác nhận mật khẩu không chính xác',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự',
        ]);

        $currentUser = $this->auth->user();

        if (! \Hash::check($request->get('old_password'), $currentUser->password))
        {
            return redirect()->back()->with('error', 'Mật khẩu cũ không chính xác.');
        }

        $result = $currentUser->fill([
            'password' => \Hash::make($request->get('password'))
        ])->save();

        if ($result)
        {
            return redirect('/profile')->with('success', 'Mật khẩu đã được cập nhật!');
        }
        return redirect()->back()->with('error', 'Không thể cập nhật được mật khẩu mới. Vui lòng thử lại!');
    }
}

Summary: NethServer vsftpd configuration
Name: nethserver-vsftpd
Version: 1.0.1
Release: 1%{?dist}
License: GPL
URL: %{url_prefix}/%{name} 
Source0: %{name}-%{version}.tar.gz
BuildArch: noarch

Requires: nethserver-base
Requires: vsftpd

BuildRequires: perl
BuildRequires: nethserver-devtools 

%description
NethServer vsftp configuration

%prep
%setup

%build
%{makedocs}
perl createlinks

%install
rm -rf $RPM_BUILD_ROOT
(cd root; find . -depth -print | cpio -dump $RPM_BUILD_ROOT)
%{genfilelist} $RPM_BUILD_ROOT --dir /var/lib/nethserver/ftp/ 'attr(0775,ftp,ftp)' > %{name}-%{version}-filelist
echo "%doc COPYING" >> %{name}-%{version}-filelist

%post

%preun

%files -f %{name}-%{version}-filelist
%defattr(-,root,root)

%changelog
* Tue Jul 08 2014 Giacomo Sanchietti <giacomo.sanchietti@nethesis.it> - 1.0.1-1.ns6
- Allow chroot on home directory for system users - Enhancement #2805

* Mon Jul 07 2014 Giacomo Sanchietti <giacomo.sanchietti@nethesis.it> - 1.0.0-1.ns6
- First FTP server release - Feature #1762

